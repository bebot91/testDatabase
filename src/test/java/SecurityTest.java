import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;
import webtester.TestWeb;

import static org.junit.jupiter.api.Assertions.assertTrue;

public class SecurityTest {
    @Test
    @DisplayName("WEB: Webserver - SECURITY - Zugriffskontrolle - Private-Bereich main ")
    public void testWebserver_Logic_Private_main () {
        // Ohne Authentifizierung muss ein Error ausgegeben werden und der COntent nicht geladen werden.
        String url = "http://0.0.0.0:8080/CRYBOT/Feautures/private/main.php";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Zugriff(url),"false");

    }

    @Test
    @DisplayName("WEB: Webserver - SECURITY - Zugriffskontrolle - Private-Bereich products ")
    public void testWebserver_Logic_Private_products () {
        // Ohne Authentifizierung muss ein Error ausgegeben werden und der COntent nicht geladen werden.
        String url = "0.0.0.0:8080/CRYBOT/Feautures/private/products.php";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_Zugriff(url),"false");

    }

}
