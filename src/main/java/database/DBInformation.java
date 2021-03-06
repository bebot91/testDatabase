package database;

public class DBInformation {
    // Database in real //
    private String database =       "User";
    private String urldb =          "jdbc:mysql://localhost:3307/"+database;
    private String user =           "testuser";
    private String password =       "password";

    public DBInformation( boolean isDockered) {
        if (isDockered){
            this.database =       "User";
            this.urldb =          "jdbc:mysql://0.0.0.0:3307/"+database;
            this.user =           "testuser";
            this.password =       "password";

        }
    }

    public String getDatabase() {
        return database;
    }

    public String getUrl() {
        return urldb;
    }

    public String getUser() {
        return user;
    }

    public String getPassword() {
        return password;
    }
}
