import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;
import org.apache.poi.hssf.usermodel.HSSFRow;
import org.apache.poi.hssf.usermodel.HSSFSheet;
import org.apache.poi.hssf.usermodel.HSSFWorkbook;
import org.apache.poi.ss.usermodel.Cell;
import org.apache.poi.ss.usermodel.CellStyle;
import org.apache.poi.ss.usermodel.CreationHelper;
import org.apache.poi.ss.usermodel.Font;
import org.apache.poi.ss.usermodel.Row;
import org.apache.poi.ss.usermodel.Sheet;
import org.apache.poi.ss.usermodel.Workbook;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;

public class Main {
	
	private static String url ="jdbc:mysql://localhost:8889/ffw";
	private static String login = "root"; 
	private static String passwd = "root";
	private static Connection connexion =null;
	private static Statement state =null;

public static void main(String[] args) throws IOException, ClassNotFoundException, SQLException {
	

	try {
		Class.forName("com.mysql.jdbc.Driver");
		connexion = DriverManager.getConnection(url,login,passwd);
		state = connexion.createStatement();
		ResultSet result = state.executeQuery("SELECT * FROM PRODUCTS WHERE is_stocked = 1 ");
	    HSSFWorkbook workbook = new HSSFWorkbook();
	    HSSFSheet sheet = workbook.createSheet("test");
	    HSSFRow rowhead = sheet.createRow((short) 0);
	    rowhead.createCell((short) 0).setCellValue("idProduct");
	    rowhead.createCell((short) 1).setCellValue("name");
	    rowhead.createCell((short) 2).setCellValue("quantity_unit");
	    rowhead.createCell((short) 3).setCellValue("quantity");
	    rowhead.createCell((short) 4).setCellValue("fk_group_product");
	
	    int i = 1;
	    while (result.next()){
	        HSSFRow row = sheet.createRow((short) i);
	        row.createCell((short) 0).setCellValue(Integer.toString(result.getInt("idProduct")));
	        row.createCell((short) 1).setCellValue(result.getString("name"));
	        row.createCell((short) 2).setCellValue(result.getString("quantity_unit"));
	        row.createCell((short) 3).setCellValue(result.getString("quantity"));
	        row.createCell((short) 4).setCellValue(result.getString("fk_group_product"));
	        i++;
	    }
	    String yemi = "exportDBtoExcel.xls";
	    FileOutputStream fileOut = new FileOutputStream(yemi);
	    workbook.write(fileOut);
	    fileOut.close();
	    } catch (ClassNotFoundException e1) {
	       e1.printStackTrace();
	    } catch (SQLException e1) {
	        e1.printStackTrace();
	    } catch (FileNotFoundException e1) {
	        e1.printStackTrace();
	    } catch (IOException e1) {
	        e1.printStackTrace();
	    }

	}
}
