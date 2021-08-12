package database;

import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class TestCall {

    private static String query;
    private static Database db = new Database(true);
    private static List<List> qresult = new ArrayList<>();

    public static boolean isConnected() {
        // Hier wird eine einfache Anfrage gesendet, um zu sehen, ob jemand antwortet
        boolean result = false;
        query = " select * from User.Wertebereich; ";
        try {
            qresult = db.selectQuery(query);
            result = true;
        } catch (SQLException throwables) {
            result = false;
        }
        return result;
    }

    public static boolean isInitialised() {
        // Hier wird eine einfache Anfrage gesendet, ob die DB komplett initialisiert wurde
        // Dabei muss innerhalb der Wertebereichstabelle Werte existieren
        boolean result = false;
        query = " select * from User.Wertebereich; ";
        try {
            qresult = db.selectQuery(query);
        } catch (SQLException throwables) {
        }

        if (qresult.size() > 5){
            result = true;
        }

        return result;
    }

    public static boolean testProcedures() {
        // Hier wird eine einfache Anfrage gesendet, ob die DB komplett initialisiert wurde
        // Dabei muss innerhalb der Wertebereichstabelle Werte existieren
        boolean result = false;

        return result;
    }


}
