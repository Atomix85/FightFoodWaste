import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Image;
import java.io.File;
import java.io.IOException;
import javax.imageio.ImageIO;
import javax.swing.JButton;
import javax.swing.JPanel;
 
public class Display2 extends JPanel {
	
  public void paintComponent(Graphics g){
	Font font = new Font("Courier",Font.BOLD,20);
	g.setFont(font);
	g.setColor(Color.blue);
    g.drawString("Bienvenue sur l'application de FightFoodWaste ", 100, 20);
    try {
        Image img = ImageIO.read(new File("logo.png"));
        g.drawImage(img, 0, 0, this);
      } catch (IOException e) {
        e.printStackTrace();
      }    
    
    
    
  }    
  
}