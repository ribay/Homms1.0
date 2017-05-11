# Homms1.0
Proyecto Integrador Utec Ribay &amp; Sebastian
package com.example.ribay_pc.buttondisponibles;

import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.widget.ArrayAdapter;
import android.widget.ListView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class Terrenos extends AppCompatActivity {

    private ListView lv_contacts_list;
    private ArrayAdapter adapter;
    private String getAllContactsURL = "http://192.168.0.24/homms/selectTerrenos.php";


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_terrenos);
        StrictMode.setThreadPolicy(new StrictMode.ThreadPolicy.Builder().permitNetwork().build());

        lv_contacts_list = (ListView)findViewById(R.id.lv_contacts_list);
        adapter = new ArrayAdapter(this, android.R.layout.simple_list_item_1);
        lv_contacts_list.setAdapter(adapter);

        webServiceRest(getAllContactsURL);
    }

    private void webServiceRest(String requestURL) {
        try {
            URL url = new URL(requestURL);
            HttpURLConnection connection = (HttpURLConnection) url.openConnection();
            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(connection.getInputStream()));
            String line = "";
            String webServiceResult = "";
            while ((line = bufferedReader.readLine()) != null) {
                webServiceResult += line;
            }
            bufferedReader.close();
            parseInformation(webServiceResult);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void parseInformation(String jsonResult){
        JSONArray jsonArray = null;
        //CREAR VARIABLES
        String titulo;
        String telefono;
        String direccion;
        String descripcion;
        String estado;
        try{
            jsonArray = new JSONArray(jsonResult);
        }catch (JSONException e){
            e.printStackTrace();
        }
        for(int i=0;i<jsonArray.length();i++){
            try{
                Log.i("For ","");
                JSONObject jsonObject = jsonArray.getJSONObject(i);
                titulo = jsonObject.getString("titulo");
                telefono = jsonObject.getString("telefono");
                direccion = jsonObject.getString("direccion");
                descripcion = jsonObject.getString("descripcion");
                estado=jsonObject.getString("estado");
                adapter.add("Nombre: " +titulo+ "\nTelefono:"+telefono+"\nDirecci�n: "+direccion+
                        "\nDescripcion:"+descripcion+"\nEstado:"+estado);
            }catch (JSONException e){
                e.printStackTrace();
            }
        }
    }
}

<?xml version="1.0" encoding="utf-8"?>
<LinearLayout
    xmlns:android="http://schemas.android.com/apk/res/android"
    xmlns:tools="http://schemas.android.com/tools"
    android:orientation="vertical"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    tools:context="com.example.ribay_pc.buttondisponibles.Casas">

    <TextView
        android:id="@+id/tv_title"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="Casas"
        android:textAlignment="center"
        android:textColor="@color/colorPrimary"
        android:textSize="20dp" />
    <ListView
        android:textColor="@color/colorPrimary"
        android:id="@+id/lv_contacts_list"
        android:layout_width="match_parent"
        android:layout_height="300dp"></ListView>
</LinearLayout>



<?xml version="1.0" encoding="utf-8"?>
<LinearLayout
    xmlns:android="http://schemas.android.com/apk/res/android"
    xmlns:tools="http://schemas.android.com/tools"
    android:orientation="vertical"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    tools:context="com.example.ribay_pc.buttondisponibles.Departamentos">

    <TextView
        android:id="@+id/tv_title"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="Departamentos"
        android:textAlignment="center"
        android:textColor="@color/colorPrimary"
        android:textSize="20dp" />
    <ListView
        android:textColor="@color/colorPrimary"
        android:id="@+id/lv_contacts_list"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"></ListView>
</LinearLayout>

<?xml version="1.0" encoding="utf-8"?>


<RelativeLayout xmlns:android="http://schemas.android.com/apk/res/android"
    xmlns:app="http://schemas.android.com/apk/res-auto"
    xmlns:tools="http://schemas.android.com/tools"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    tools:context="com.example.ribay_pc.buttondisponibles.MainActivity">

    <TextView
        android:id="@+id/textView"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:layout_alignParentTop="true"
        android:layout_centerHorizontal="true"
        android:text="Bienvenido a Homms"
        android:textAppearance="@style/TextAppearance.AppCompat.Body2"
        app:layout_constraintBottom_toBottomOf="parent"
        app:layout_constraintLeft_toLeftOf="parent"
        app:layout_constraintRight_toRightOf="parent"
        app:layout_constraintTop_toTopOf="parent" />

    <Button
        android:id="@+id/buttoncasas"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:layout_marginLeft="27dp"
        android:layout_marginStart="27dp"
        android:layout_marginTop="82dp"
        android:background="@drawable/ic_home3"
        android:layout_below="@+id/textView"
        android:layout_alignParentLeft="true"
        android:layout_alignParentStart="true" />

    <Button
        android:id="@+id/buttondepa"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:background="@drawable/ic_office"
        android:layout_alignBaseline="@+id/buttoncasas"
        android:layout_alignBottom="@+id/buttoncasas"
        android:layout_centerHorizontal="true" />

    <Button
        android:id="@+id/buttonterrenos"
        android:layout_width="wrap_content"
        android:layout_height="wrap_content"
        android:background="@drawable/ic_location2"
        android:layout_marginRight="18dp"
        android:layout_marginEnd="18dp"
        android:layout_alignBaseline="@+id/buttondepa"
        android:layout_alignBottom="@+id/buttondepa"
        android:layout_alignParentRight="true"
        android:layout_alignParentEnd="true" />

</RelativeLayout>


<?xml version="1.0" encoding="utf-8"?>
<LinearLayout
    xmlns:android="http://schemas.android.com/apk/res/android"
    xmlns:tools="http://schemas.android.com/tools"
    android:orientation="vertical"
    android:layout_width="match_parent"
    android:layout_height="match_parent"
    tools:context="com.example.ribay_pc.buttondisponibles.Terrenos">

    <TextView
        android:id="@+id/tv_title"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"
        android:text="Terrenos"
        android:textAlignment="center"
        android:textColor="@color/colorPrimary"
        android:textSize="20dp" />
    <ListView
        android:textColor="@color/colorPrimary"
        android:id="@+id/lv_contacts_list"
        android:layout_width="match_parent"
        android:layout_height="wrap_content"></ListView>
</LinearLayout>


package com.example.ribay_pc.buttondisponibles;

import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.widget.ArrayAdapter;
import android.widget.ListView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class Casas extends AppCompatActivity {

    private ListView lv_contacts_list;
    private ArrayAdapter adapter;
    private String getAllContactsURL = "http://192.168.0.24/homms/selectAll.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_casas);

        StrictMode.setThreadPolicy(new StrictMode.ThreadPolicy.Builder().permitNetwork().build());

        lv_contacts_list = (ListView)findViewById(R.id.lv_contacts_list);
        adapter = new ArrayAdapter(this, android.R.layout.simple_list_item_1);
        lv_contacts_list.setAdapter(adapter);

        webServiceRest(getAllContactsURL);
    }
    private void webServiceRest(String requestURL) {
        try {
            URL url = new URL(requestURL);
            HttpURLConnection connection = (HttpURLConnection) url.openConnection();
            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(connection.getInputStream()));
            String line = "";
            String webServiceResult = "";
            while ((line = bufferedReader.readLine()) != null) {
                webServiceResult += line;
                Log.e("error","--------------------------------------------------------"+webServiceResult);
            }
            bufferedReader.close();
            parseInformation(webServiceResult);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void parseInformation(String jsonResult){
        JSONArray jsonArray = null;
        //CREAR VARIABLES
        String titulo;
        String telefono;
        String direccion;
        String descripcion;
        String estado;
        try{
            jsonArray = new JSONArray(jsonResult);
        }catch (JSONException e){
            e.printStackTrace();
        }
        for(int i=0;i<jsonArray.length();i++){
            try{
                Log.i("For ","");
                JSONObject jsonObject = jsonArray.getJSONObject(i);
                titulo = jsonObject.getString("titulo");
                telefono = jsonObject.getString("telefono");
                direccion = jsonObject.getString("direccion");
                descripcion = jsonObject.getString("descripcion");
                estado=jsonObject.getString("estado");
                adapter.add("Nombre: " +titulo+ "\nTelefono:"+telefono+"\nDirecci�n: "+direccion+
                        "\nDescripcion:"+descripcion+"\nEstado:"+estado);
            }catch (JSONException e){
                e.printStackTrace();
            }
        }
    }
}

package com.example.ribay_pc.buttondisponibles;

import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.widget.ArrayAdapter;
import android.widget.ListView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class Departamentos extends AppCompatActivity {

    private ListView lv_contacts_list;
    private ArrayAdapter adapter;
    private String getAllContactsURL = "http://192.168.0.24/homms/selectDepartamentos.php";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_departamentos);

        StrictMode.setThreadPolicy(new StrictMode.ThreadPolicy.Builder().permitNetwork().build());

        lv_contacts_list = (ListView)findViewById(R.id.lv_contacts_list);
        adapter = new ArrayAdapter(this, android.R.layout.simple_list_item_1);
        lv_contacts_list.setAdapter(adapter);

        webServiceRest(getAllContactsURL);

        Log.e("getAllContactsURL",getAllContactsURL);
    }
    private void webServiceRest(String requestURL) {
        try {
            URL url = new URL(requestURL);
            HttpURLConnection connection = (HttpURLConnection) url.openConnection();
            Log.e("url",url.toString());
            BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(connection.getInputStream()));
            String line = "";
            String webServiceResult = "";
            Log.e("buffer", bufferedReader.toString());
            while ((line = bufferedReader.readLine()) != null) {
                webServiceResult += line;
                Log.e("Line ",line);

            }
            bufferedReader.close();
            Log.e("webServiceResult",webServiceResult);
            parseInformation(webServiceResult);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void parseInformation(String jsonResult){
        JSONArray jsonArray = null;
        //CREAR VARIABLES
        String titulo;
        String telefono;
        String direccion;
        String descripcion;
        String estado;
        try{
            jsonArray = new JSONArray(jsonResult);
        }catch (JSONException e){
            e.printStackTrace();
        }
        for(int i=0;i<jsonArray.length();i++){
            try{
                Log.i("For ","");
                JSONObject jsonObject = jsonArray.getJSONObject(i);
                titulo = jsonObject.getString("titulo");
                telefono = jsonObject.getString("telefono");
                direccion = jsonObject.getString("direccion");
                descripcion = jsonObject.getString("descripcion");
                estado=jsonObject.getString("estado");
                adapter.add("Nombre: " +titulo+ "\nTelefono:"+telefono+"\nDirecci�n: "+direccion+
                        "\nDescripcion:"+descripcion+"\nEstado:"+estado);
            }catch (JSONException e){
                e.printStackTrace();
            }
        }
    }
}

