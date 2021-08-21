
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

    @Test
    @DisplayName("WEB: Webserver - SMOKETEST - public index")
    public void testWebserver_Smoke_Public_index () {

        String url = "http://0.0.0.0:80";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Smoketest(url),"false");

    }

    @Test
    @DisplayName("WEB: Webserver - SMOKETEST - public products")
    public void testWebserver_Smoke_Public_produkte () {

        String url = "http://0.0.0.0:80/CRYBOT/Feautures/public/produkte.php";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Smoketest(url),"false");

    }

    @Test
    @DisplayName("WEB: Webserver - SMOKETEST - public information")
    public void testWebserver_Smoke_Public_information () {

        String url = "http://0.0.0.0:80/CRYBOT/Feautures/public/info.php";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Smoketest(url),"false");

    }

    @Test
    @DisplayName("WEB: Webserver - SMOKETEST - private welcome")
    public void testWebserver_Smoke_Private_welcome () {

        String url = "http://0.0.0.0:80/CRYBOT/Feautures/private/Welcome.php";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Smoketest(url),"false");

    }

    @Test
    @DisplayName("WEB: Webserver - SMOKETEST - private main")
    public void testWebserver_Smoke_Private_main () {

        String url = "http://0.0.0.0:80/CRYBOT/Feautures/private/main.php";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Smoketest(url),"false");

    }

    @Test
    @DisplayName("WEB: Webserver - SMOKETEST - private settings")
    public void testWebserver_Smoke_Private_settings () {

        String url = "0.0.0.0:80/CRYBOT/Feautures/private/settings.php";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Smoketest(url),"false");

    }

    @Test
    @DisplayName("WEB: Webserver - SMOKETEST - private products")
    public void testWebserver_Smoke_Private_products () {

        String url = "0.0.0.0:80/CRYBOT/Feautures/private/products.php";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Smoketest(url),"false");

    }

    @Test
    @DisplayName("WEB: Webserver - SMOKETEST - API coindata")
    public void testWebserver_Smoke_Private_API_Coindata () {

        String url = "0.0.0.0:80/CRYBOT/Include/PHP/api/getCoindata.php/1/CRO_USDT";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Smoketest(url),"false");

    }
}
