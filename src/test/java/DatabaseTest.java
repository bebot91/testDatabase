
import database.TestCall;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;
import webtester.TestWeb;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.stream.Collectors;

import static org.hamcrest.MatcherAssert.assertThat;
import static org.hamcrest.Matchers.containsInAnyOrder;
import static org.junit.jupiter.api.Assertions.*;

public class DatabaseTest {


    // INit
    @BeforeEach
    public void setUp() throws Exception {
    }

    @Test
    @DisplayName("DB: Database - Smoketest")
    public void testConnection (){
        // Hier wird getestet, on die Verbindung möglich ist.
        TestCall tcall = new TestCall();
        assertTrue(tcall.isConnected(),"false");

    }

    @Test
    @DisplayName("DB: Database - Initialised")
    public void testInitialState (){
        // Hier wird getestet, ob ein Wertebereich initialisiert wurde
        TestCall tcall = new TestCall();
        assertTrue(tcall.isInitialised(),"false");

    }

    @Test
    @DisplayName("DB: Database - PROC 1 - sps_GET_LOGIN")
    public void testProcedures_sps_GET_LOGIN (){
        // Hier wird getestet, ob ein Wertebereich initialisiert wurde
        TestCall tcall = new TestCall();
        assertTrue(tcall.testProcedures_GET_LOGIN(),"false");
    }

    @Test
    @DisplayName("DB: Database - PROC 2 - sps_GET_COINDATA")
    public void testProcedures_sps_GET_COINDATA (){
        // Hier wird getestet, ob ein Wertebereich initialisiert wurde
        TestCall tcall = new TestCall();
        assertTrue(tcall.testProcedures_GET_COINDATA(),"false");
    }

    @Test
    @DisplayName("DB: Database - PROC 3 - sps_GET_MENUEBUTTON")
    public void testProcedures_sps_GET_MENUEBUTTON (){
        // Hier wird getestet, ob ein Wertebereich initialisiert wurde
        TestCall tcall = new TestCall();
        assertTrue(tcall.testProcedures_GET_MENUEBUTTON(),"false");
    }

    @Test
    @DisplayName("DB: Database - PROC 4 - sps_IN_newUser")
    public void testProcedures_sps_IN_newUser (){
        // Hier wird getestet, ob ein Wertebereich initialisiert wurde
        TestCall tcall = new TestCall();
        assertTrue(tcall.testProcedures_IN_newUser(),"false");
    }


}
