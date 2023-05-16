package com.example.parkingapp;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;



public class RegistrarVehiculo extends AppCompatActivity {

    private EditText marcaVehiculo, matriculaVehiculo, colorVehiculo;
    private static Vehiculo vehiculo;

    private Button plazaVehiculo,atras;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registrar_vehiculo);

        marcaVehiculo = findViewById(R.id.editTextTextPersonName);
        matriculaVehiculo = findViewById(R.id.editTextTextPersonName5);
        colorVehiculo = findViewById(R.id.editTextTextPersonName4);
        plazaVehiculo = findViewById(R.id.button6);
        atras = findViewById(R.id.button8);

        atras.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent atras = new Intent(RegistrarVehiculo.this, windowHome.class);
                startActivity(atras);
            }
        });


        plazaVehiculo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String marca = marcaVehiculo.getText().toString();
                String matricula = matriculaVehiculo.getText().toString();
                String color = colorVehiculo.getText().toString();

                if (TextUtils.isEmpty(marca) || TextUtils.isEmpty(matricula) || TextUtils.isEmpty(color)) {
                    Toast.makeText(RegistrarVehiculo.this, "Todos los campos deben estar llenos", Toast.LENGTH_SHORT).show();
                } else {
                    vehiculo = new Vehiculo(marca, matricula, color, null);
/*
                    MongoClient mongoClient = MongoClients.create("mongodb+srv://jorgeca2002:1357924680@cluster0.aedynyz.mongodb.net/parking?authMechanism=SCRAM-SHA-1");
                    MongoDatabase database = mongoClient.getDatabase("<database>");
                    MongoCollection<Document> collection = database.getCollection("<collection>");

                    Document vehiculoDoc = new Document("marca", marca).append("matricula", matricula).append("color", color);

                    collection.insertOne(vehiculoDoc);
*/
                    Intent registerVehicle = new Intent(RegistrarVehiculo.this, windowHome.class);
                    startActivity(registerVehicle);

                    Intent plazas = new Intent(RegistrarVehiculo.this, Plazas.class);
                    startActivity(plazas);
                }
            }
        });
    }

    public static Vehiculo getVehiculo() {
        return vehiculo;
    }
}

