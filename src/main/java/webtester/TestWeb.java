package webtester;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.stream.Collectors;

public class TestWeb {

    public static boolean Webtester_Smoketest (String url) {

        boolean isReachable = false;
        String command = "curl -X GET "+url;
        try {
            Process process = Runtime.getRuntime().exec(command);
            String result = new BufferedReader(new InputStreamReader(process.getInputStream()))
                    .lines().collect(Collectors.joining("\n"));
            System.out.println(result);
            if (!result.contains("<title>404 Not Found</title>") && result.length() > 1){
                isReachable = true;
            }
        } catch (IOException e) {
            e.printStackTrace();
        }

        return isReachable;

    }
}
