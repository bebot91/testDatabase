
import database.TestCall;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;

import static org.hamcrest.MatcherAssert.assertThat;
import static org.hamcrest.Matchers.containsInAnyOrder;
import static org.junit.jupiter.api.Assertions.*;

public class DatabaseTest {

    private Employee employee;

    // INit
    @BeforeEach
    public void setUp() throws Exception {
    }

    @Test
    @DisplayName("Teste Ob Datenbankverbindung möglich")
    public void testConnection (){
        // Hier wird getestet, on die Verbindung möglich ist.

        TestCall tcall = new TestCall();
        assertTrue(tcall.isConnected(),"false");

    }

    @Test
    @DisplayName("Teste Ob Datenbank initialisiert")
    public void testInitialState (){
        // Hier wird getestet, ob ein Wertebereich initialisiert wurde
        TestCall tcall = new TestCall();
        assertTrue(tcall.isInitialised(),"false");

    }

    @Test
    @DisplayName("Teste Ob Datenbank initialisiert")
    public void testProcedures (){
        // Hier wird getestet, ob ein Wertebereich initialisiert wurde
        TestCall tcall = new TestCall();
        assertTrue(tcall.testProcedures(),"false");

    }


}
