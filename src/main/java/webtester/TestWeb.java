package webtester;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.stream.Collectors;

public class TestWeb {

    public static boolean Webtester_Smoketest (String url) {

        boolean isReachable = false;
        String command = "curl -X GET "+url;
        try {
            Process process = Runtime.getRuntime().exec(command);
            String result = new BufferedReader(new InputStreamReader(process.getInputStream()))
                    .lines().collect(Collectors.joining("\n"));
            if (!result.contains("<title>404 Not Found</title>") && result.length() > 1){
                isReachable = true;
            }
        } catch (IOException e) {
            e.printStackTrace();
        }

        return isReachable;

    }

    public static boolean Webtester_Zugriff (String url) {

        boolean isReachable = true;
        String command = "curl -X GET "+url;
        try {
            Process process = Runtime.getRuntime().exec(command);
            String result = new BufferedReader(new InputStreamReader(process.getInputStream()))
                    .lines().collect(Collectors.joining("\n"));

            if (result.contains("<b>Warning</b>") && result.contains(" Undefined array key \"rtoken\" ")){
                isReachable = false;
            }
        } catch (IOException e) {
            e.printStackTrace();
        }

        return isReachable;

    }

    public static boolean Webtester_API (String url) {

        boolean isReachable = false;
        String command = "curl -X GET "+url;
        JSONArray dataRow = new JSONArray();
        try {
            Process process = Runtime.getRuntime().exec(command);
            String result = new BufferedReader(new InputStreamReader(process.getInputStream()))
                    .lines().collect(Collectors.joining("\n"));
            if (result.length() > 0){
                // es gibt eine Rückgabe ...
                JSONObject jsonObject = new JSONObject(result);
                dataRow = (JSONArray) jsonObject.get("datarow1");
                if (dataRow.length() == 20){
                    // Das Array muss exakt 20 Stellen lang sein...
                    isReachable = true;
                }
            }
        } catch (IOException e) {
            e.printStackTrace();
        }

        return isReachable;

    }
}
