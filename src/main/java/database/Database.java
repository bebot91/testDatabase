package database;



import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class Database {

    private static boolean isDockered = false;
    private static DBInformation db;


    public Database(boolean isDockered) {
        this.isDockered = isDockered;
    }

    public static List selectQuery(String query) throws SQLException {
        db = new DBInformation(isDockered);
        try {
            Class.forName("com.mysql.jdbc.Driver");
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        }
        List<String> Select = new ArrayList<>();
        Connection con = DriverManager.getConnection(db.getUrl(), db.getUser(), db.getPassword());
        Select  = readDataFromSet(selectDB(query,con));
        con.close();
        return Select;
    }

    public static int       executeDB(String query) throws SQLException {
        db = new DBInformation(isDockered);
        try {
            Class.forName("com.mysql.jdbc.Driver");
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        }
        try {
            Connection con = DriverManager.getConnection(db.getUrl(), db.getUser(), db.getPassword());
            Statement statement = con.createStatement();
            statement.executeUpdate(query);
            con.close();
            return 1;
        }
        catch (Exception ex){
            System.out.println(ex.getMessage());
            System.out.println(query);
            return 0;
        }
    }

    public static ResultSet selectDB(String query,Connection con) throws SQLException {
        db = new DBInformation(isDockered);
        try {
            Statement statement = con.createStatement();
            return statement.executeQuery(query);
        }
        catch (Exception ex){

            System.out.println("Verbindung zur Datenbank Fehlgeschlagen!" +
                    "\nÜberprüfen Sie die Einstallung unter basis/database/DBConnector");
            System.out.println(ex.getMessage());
            System.out.println("\n\n");

            return null;
        }
    }

    private static List     readDataFromSet(ResultSet result) throws SQLException{
        ArrayList<List> Data = new ArrayList<>(); // Resultat des Parsings
        if (result != null) {
            while (result.next()) {
                // Länge des Tupels erruieren aus Metadata
                int count = result.getMetaData().getColumnCount();

                ArrayList<String> tupel = new ArrayList<>();

                for (int i = 1; i <= count; i++) {
                    // Lese Tupel in Stringlist
                    tupel.add(result.getString(i));
                }
                // Lese Stringlist in List<List>
                Data.add(tupel);
            }
        }



        return Data;
    }

}
