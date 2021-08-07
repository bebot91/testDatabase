package database;

import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class DatabaseCall {

    private static Database db = new Database();
    private static List<List> tasks = new ArrayList<>();


    public static List call_getTasks_NI() throws SQLException {
        String query = " call basis.sps_LOGGER_GET_NINTERVAL_JOB(); ";
        tasks = db.selectQuery(query);

        return tasks;
    }

    public static List call_getTasks_I() throws SQLException {
        String query = " call basis.sps_LOGGER_GET_INTERVAL_JOB(); ";
        tasks = db.selectQuery(query);

        return tasks;
    }

    public static void call_execTask(String query) throws SQLException{

        db.executeDB(query);

    }
}
