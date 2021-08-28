import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;
import webtester.TestWeb;

import static org.junit.jupiter.api.Assertions.assertTrue;

public class IntegrationTest {

    @Test
    @DisplayName("WEB: Webserver - Integrationtest - API coindata")
    public void testWebserver_Smoke_Private_API_Coindata () {

        String url = "http://localhost:8080/CRYBOT/Include/PHP/api/getCoindata.php/1/CRO_USDT";
        TestWeb web = new TestWeb();
        assertTrue(web.Webtester_API(url),"false");

    }

}
