import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;
import webtester.TestWeb;

import static org.junit.jupiter.api.Assertions.assertTrue;

public class SmokeTest {


    @Test
    @DisplayName("WEB: Webserver - SMOKETEST - public index")
    public void testWebserver_Smoke_Public_index () {

        String url = "http://127.0.0.1:8080";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Smoketest(url),"false");

    }

    @Test
    @DisplayName("WEB: Webserver - SMOKETEST - public products")
    public void testWebserver_Smoke_Public_produkte () {

        String url = "http://127.0.0.1:8080/CRYBOT/Feautures/public/produkte.php";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Smoketest(url),"false");
    }

    @Test
    @DisplayName("WEB: Webserver - SMOKETEST - public information")
    public void testWebserver_Smoke_Public_information () {

        String url = "http://127.0.0.1:8080/CRYBOT/Feautures/public/info.php";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Smoketest(url),"false");
    }

    @Test
    @DisplayName("WEB: Webserver - SMOKETEST - private welcome")
    public void testWebserver_Smoke_Private_welcome () {

        String url = "http://127.0.0.1:8080/CRYBOT/Feautures/private/Welcome.php";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Smoketest(url),"false");
    }

    @Test
    @DisplayName("WEB: Webserver - SMOKETEST - private main")
    public void testWebserver_Smoke_Private_main () {

        String url = "http://127.0.0.1:8080/CRYBOT/Feautures/private/main.php";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Smoketest(url),"false");

    }

    @Test
    @DisplayName("WEB: Webserver - SMOKETEST - private settings")
    public void testWebserver_Smoke_Private_settings () {

        String url = "http://127.0.0.1:8080/CRYBOT/Feautures/private/settings.php";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Smoketest(url),"false");

    }

    @Test
    @DisplayName("WEB: Webserver - SMOKETEST - private products")
    public void testWebserver_Smoke_Private_products () {

        String url = "http://127.0.0.1:8080/CRYBOT/Feautures/private/products.php";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Smoketest(url),"false");

    }

    @Test
    @DisplayName("KEYKLOAK: Keycloak - SMOKETEST - Auth")
    public void testKeycloak_Smoke_Auth () {

        String url = "http://127.0.0.1:8180/auth/";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Smoketest(url),"false");

    }

}
