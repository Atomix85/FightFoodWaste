import java.awt.BorderLayout;
import java.awt.Image;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.File;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

import javax.imageio.ImageIO;
import javax.swing.JComboBox;
import javax.swing.JFrame;
import javax.swing.JMenu;
import javax.swing.JMenuBar;
import javax.swing.JMenuItem;
import javax.swing.JScrollPane;
import javax.swing.JTable;

public class Windows extends JFrame {

	private ArrayList<String> test = new ArrayList<String>() ;
	private ArrayList<String> test2 = new ArrayList<String>() ;
	//private static ArrayList<String> test3 = new ArrayList<String>() ;
	private static String[] comboData2 = {};
	private static String[] test3 = {};
	private String[] comboData = {};
	private JComboBox<String> combo;
	private static JComboBox<String> combo2;
	private static String url ="jdbc:mysql://localhost:8889/ffw";
	private static String login = "root"; 
	private static String passwd = "root";
	private static Connection connexion =null;
	private static Statement state =null;
	
	private JMenuBar menuBar = new JMenuBar();
	private JMenu add_recept = new JMenu("Ajouter une recette");
	private JMenu test6 = new JMenu("A propos de nous");
	private JMenu leave1 = new JMenu("Quitter");
	private JMenuItem item1 = new JMenuItem("Ouvrir");
	private JMenuItem item2 = new JMenuItem("Fermer");
	private JMenuItem item3 = new JMenuItem("Lancer");
	private JMenuItem item4 = new JMenuItem("Arreter");
	
	
	private JTable tableau;
	
	public Windows() throws SQLException, ClassNotFoundException {
			
		this.setTitle("Suggestion intelligente Menu");
	    this.setSize(700, 500);
	    this.setLocationRelativeTo(null);
	    
	   
	    
	    /*add_recept.addActionListener(new ActionListener() {
			@Override
			public void actionPerformed(ActionEvent e) {
				System.out.print("ok");
				JFrame fenetre = new JFrame();
				fenetre.setTitle("2eme fenetre");
				fenetre.setSize(400,100);
				fenetre.setLocationRelativeTo(null);
				 //Termine le processus lorsqu'on clique sur la croix rouge
				 fenetre.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
					    //Et enfin, la rendre visible        
					    fenetre.setVisible(true);
					
			}	
	    });*/
	    
	    this.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
	    this.createContent();
	    
	   
	    
	}
	    private void createContent() throws SQLException, ClassNotFoundException{ 
		    
	    	
	    	Connexion();
	    	test = liste_d();
	    	comboData = GetStringArray(test);
	    	combo = new JComboBox<String>(comboData);
	    	this.getContentPane().add(combo, BorderLayout.NORTH);
	    	combo.addActionListener(new FormeListener());
	    	
	    	test2 = Menu("");
	    	comboData2 = GetStringArray(test2);
	    	combo2 = new JComboBox<String>(comboData2);
	    	this.getContentPane().add(combo2, BorderLayout.WEST);
	    	combo2.addActionListener(new FormeListenerMenu());

		    //Les données du tableau
	  	    Object[][] data = {{"","",""}};
	  	    String  title[] = {"Ingrédients", "Quantités", "Recette"};
	  	    Tab tab2 = new Tab(data,title);
	  	    this.tableau = new JTable(tab2);
	  	    this.getContentPane().add(new JScrollPane(tableau), BorderLayout.CENTER);
	  	    
	  	    menuBar.add(add_recept);
		    menuBar.add(test6);
		    menuBar.add(leave1);
		    setJMenuBar(menuBar);
		    
		    leave1.addActionListener(new Leave());
	  	    
	    }
	    
	    class Leave implements ActionListener{
		    public void actionPerformed(ActionEvent e) {
		    	System.out.println("je quitte");
		    	System.exit(0);		
		    }  
	    }
	  
	  // Liste déroulante Ingrédient  
	  class FormeListener implements ActionListener{
		    public void actionPerformed(ActionEvent e) {
			   	//System.out.println("ActionListener : action sur " + combo.getSelectedItem());
			    String concat = "";
			    concat = "%" + combo.getSelectedItem() + "%";
			    //System.out.println(concat);
			    try { 
					test2 = Menu(concat);
				} catch (SQLException e1) {
					e1.printStackTrace();
				}
			    	
		    }  
	  }
	  
	  class FormeListenerMenu implements ActionListener {
		    public void actionPerformed(ActionEvent e) {
		    	 System.out.println("ActionListener : action sur " + combo2.getSelectedItem());
		    	 String concat = "";
		    	 concat = "\"" + combo2.getSelectedItem() + "\"";
		    	 System.out.println(concat);
		    	 
		    	 try {
					state = connexion.createStatement();
				} catch (SQLException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
		    	 ResultSet result = null;
				try {
					result = state.executeQuery("SELECT * FROM Menu WHERE nom = " + concat );
				} catch (SQLException e1) {
					// TODO Auto-generated catch block
					e1.printStackTrace();
				}
					ArrayList<String> ingredient = new ArrayList<String>();
					ArrayList<String> quantity = new ArrayList<String>();
					ArrayList<String> recipe = new ArrayList<String>();
					//al.add("");
					try {
						while(result.next()) {
							ingredient.add(result.getString("ingredient"));
							quantity.add(result.getString("quantity"));
							recipe.add(result.getString("recipe"));
						}
					} catch (SQLException e1) {
						// TODO Auto-generated catch block
						e1.printStackTrace();
					}
		    	 
		    		 ((Tab)tableau.getModel()).removeRow(0);
		    		 System.out.println("ok");
		    		 Object[] donnee = new Object[]
		    				 {
		    		  	      ingredient, quantity,recipe
		    		  	    };
		    		 ((Tab)tableau.getModel()).addRow(donnee);		 
		    	 
				System.out.println(donnee);
		    }  
		  }
	  
	  
	  
	  public static void Connexion() throws SQLException, ClassNotFoundException {
			Class.forName("com.mysql.jdbc.Driver");
			System.out.println("Etape1: chargement driver\n");
			connexion = DriverManager.getConnection(url,login,passwd);
			System.out.println("Etape2: Connexion BDD \n");
		
		}
		
	  	// Liste déroulante ingrédient
		public static ArrayList<String> liste_d() throws SQLException {
			state = connexion.createStatement();
			ResultSet result = state.executeQuery("SELECT DISTINCT name FROM PRODUCTS WHERE is_stocked = 1 ");
			ArrayList<String> al = new ArrayList<String>();
			al.add("");
			while(result.next()) {
				al.add(result.getString("name"));
			}
			System.out.println(al);
			
			return al;	
		}
		
		public static ArrayList<String> Menu(Object object) throws SQLException {
			state = connexion.createStatement();
			ResultSet result = state.executeQuery("SELECT nom FROM Menu WHERE ingredient LIKE '"+object +"'");
			System.out.println(object);
			ArrayList<String> al = new ArrayList<String>();
			
			//al.add("");
			while(result.next()) {
				al.add(result.getString("nom"));
			}
			System.out.println(al);
			try {
			combo2.addItem(al.get(0));
			}catch(Exception e) {
				System.out.println("nulle");
			}
			//combo, BorderLayout.NORTH
			return al;	
		}
		
		/*public static ArrayList<String> Menu() throws SQLException {
			state = connexion.createStatement();
			ResultSet result = state.executeQuery("SELECT nom FROM Menu WHERE ingredient LIKE '%tomates%'");
			//System.out.println(object);
			ArrayList<String> al = new ArrayList<String>();
			al.add("");
			while(result.next()) {
				al.add(result.getString("nom"));
			}
			System.out.println(al);
			return al;	
		}*/
		
		// Convertir String en Array
		public static String[] GetStringArray(ArrayList<String> arr) { 

	        // declaration and initialise String Array 
	        String str[] = new String[arr.size()]; 
	  
	        // Convert ArrayList to object array 
	        Object[] objArr = arr.toArray(); 
	  
	        // Iterating and converting to String 
	        int i = 0; 
	        for (Object obj : objArr) { 
	            str[i++] = (String)obj; 
	        } 
	  
	        return str; 
	    } 
			
}

