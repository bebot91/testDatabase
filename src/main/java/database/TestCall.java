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

    public static boolean testProcedures_GET_LOGIN() {
        // sps_GET_LOGIN erstellt beim ersten Login den Account in der Datenbank
        // Falls der KK User in der Datenbank bereits existiert, darf dieser nicht erneut erstellt werden...
        boolean result = false;
        int userVorU;
        int userNachU;

        // Initial-Login --> Der USer soll neu angelegt werden
        try {
            query = " call User.sps_GET_LOGIN('KK_USER_12345','0.0.0.0','client Browser'); ";
            qresult = db.selectQuery(query);
            query = " select count(*) from User.User; ";
            qresult = db.selectQuery(query);
        } catch (SQLException throwables) {
        }
        // Ermittle wieviele User in der DB existieren
        userVorU = Integer.parseInt((String) qresult.get(0).get(0));

        // Erneutes-Login --> Der USer soll nicht angelegt werden
        try {
            // Anlegen eines Users in der Db
            query = " call User.sps_GET_LOGIN('KK_USER_12345','0.0.0.0','client Browser'); ";
            qresult = db.selectQuery(query);
            query = " select count(*) from User.User; ";
            qresult = db.selectQuery(query);
        } catch (SQLException throwables) {
        }
        // Ermittle wieviele User in der DB existieren
        userNachU = Integer.parseInt((String) qresult.get(0).get(0));



        if (userNachU == userNachU){
            // Falls kein neuer User beim erneuten Login angelegt wurde - ERFOLG+
            result = true;
        }


        return result;
    }

    public static boolean testProcedures_GET_COINDATA() {
        // sps_GET_COINDATA erstellt beim ersten Login den Account in der Datenbank
        // Der Server erwartet in jedem Fall ein Array,
        // Falls die Plattform nicht implementiert ist oder keine Coins zur
        // Verfügung gestellt werden muss ein LEERES Array zurückgegeben weden...
        boolean result = false;
        int arrayLen1;
        int arrayLen2;
        int arrayLen3;
        // Plattform hat aktive Coin's ...
        try {
            query = " call User.sps_GET_COINDATA(1); ";
            qresult = db.selectQuery(query);

        } catch (SQLException throwables) {
        }
        arrayLen1 = qresult.get(0).size();


        if (arrayLen1 == 8){
            result = true;
        }


        return result;
    }

    public static boolean testProcedures_GET_MENUEBUTTON() {
        // sps_GET_MENUEBUTTON soll die Menueauswahlen zur Verfügung stellen...
        // Diese können dynamisch innerhalb des Wertebereiches definiert werden...
        // Um die Test's dynamisch zu führen wird keine Fixe Zahl erwartet
        // Es wird nur getestet, ob Daten ausgegeben werden..
        boolean result = false;
        int arrayLen1;

        try {
            query = " call User.sps_GET_MENUEBUTTON('index'); ";
            qresult = db.selectQuery(query);

        } catch (SQLException throwables) {
        }
        arrayLen1 = qresult.size();


        if (arrayLen1 > 0){
            result = true;
        }


        return result;
    }

    public static boolean testProcedures_IN_newUser() {
        List<List> qresul1 = new ArrayList<>();
        List<List> qresul2 = new ArrayList<>();
        List<List> qresul3 = new ArrayList<>();
        List<List> qresul4 = new ArrayList<>();
        boolean result = false;
        // Nehme anzahl der Tupels vor dem Insert auf ...
        try {
            query = " select count(*) from User.UserSettings; ";
            qresul1 = db.selectQuery(query);
            query = " select count(*) from User.User; ";
            qresul2 = db.selectQuery(query);
            query = " select count(*) from User.UserHistory; ";
            qresul3 = db.selectQuery(query);
            query = " select count(*) from User.Session; ";
            qresul4 = db.selectQuery(query);
        } catch (SQLException throwables) {
        }
        int tupelsBeforeUSett= Integer.parseInt((String) qresul1.get(0).get(0));
        int tupelsBeforeUser = Integer.parseInt((String) qresul2.get(0).get(0));
        int tupelsBeforeUHist= Integer.parseInt((String) qresul3.get(0).get(0));
        int tupelsBeforeSess = Integer.parseInt((String) qresul4.get(0).get(0));


        // INSERT new User
        try {
            query = " call User.sps_IN_newUser('KK_USER_NEW',1,'0.0.0.0','CLIENT') ";
            qresul1 = db.selectQuery(query);
        } catch (SQLException throwables) {
        }


        // Nehme anzahl der Tupels nach dem Insert auf ...
        try {
            query = " select count(*) from User.UserSettings; ";
            qresul1 = db.selectQuery(query);
            query = " select count(*) from User.User; ";
            qresul2 = db.selectQuery(query);
            query = " select count(*) from User.UserHistory; ";
            qresul3 = db.selectQuery(query);
            query = " select count(*) from User.Session; ";
            qresul4 = db.selectQuery(query);
        } catch (SQLException throwables) {
        }
        int tupelsAfterUSett= Integer.parseInt((String) qresul1.get(0).get(0));
        int tupelsAfterUser = Integer.parseInt((String) qresul2.get(0).get(0));
        int tupelsAfterUHist= Integer.parseInt((String) qresul3.get(0).get(0));
        int tupelsAfterSess = Integer.parseInt((String) qresul4.get(0).get(0));

        if (        tupelsAfterUSett == (tupelsBeforeUSett + 1)
                &&  tupelsAfterUser == (tupelsBeforeUser + 1)
                &&  tupelsAfterUHist == (tupelsBeforeUHist + 1)
        )
        {

            result = true;
        }


        return result;
    }
}
