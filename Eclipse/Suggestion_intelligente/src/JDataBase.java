/**************** importer les classes importantes **************************/
import java.util.ArrayList;
import java.util.Date;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.sql.PreparedStatement;
// Classe principale de gestion d'une base de données de livres

public class JDataBase {
	
	static String url ="jdbc:mysql://localhost:8889/ffw";
	static String login = "root"; 
	static String passwd = "root";
	static Connection connexion =null;
	static Statement state =null;
	
/************************** Méthode main 
 * @throws SQLException 
 * @throws ClassNotFoundException **************************/
	
	public static void Con() throws SQLException, ClassNotFoundException {
		Class.forName("com.mysql.jdbc.Driver");
		//System.out.println("Etape1: chargement driver\n");
		connexion = DriverManager.getConnection(url,login,passwd);
		//System.out.println("Etape2: Connexion BDD \n");
		//liste_d();
		//Menu();
	}
		
	public static void liste_d() throws SQLException {
		state = connexion.createStatement();
		ResultSet result = state.executeQuery("SELECT DISTINCT name FROM PRODUCTS WHERE is_stocked = &1 ");
		ArrayList al = new ArrayList();
		while(result.next()) {
			al.add(result.getString("name"));
		}
		System.out.print(al);	
	}
	
	public static void Menu() throws SQLException {
		state = connexion.createStatement();
		ResultSet result = state.executeQuery("SELECT * FROM Menu ");
		//System.out.println("Nom \t Ingredient \t Quantités	\t Recette \t Durée de Préparation \t Cuisson");
		ArrayList al = new ArrayList();
		while(result.next()) {
			al.add(result.getString("Nom"));
		}
		System.out.print(al);	
	}
		
}
		
	

