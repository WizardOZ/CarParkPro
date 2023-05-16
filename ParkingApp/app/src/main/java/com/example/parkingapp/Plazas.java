package com.example.parkingapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;
import java.util.ArrayList;
import java.util.List;
import java.util.Random;

public class Plazas extends AppCompatActivity {

    private boolean seleccion = false;
    private Button confirmar,atras;
    private static Vehiculo vehiculo;
    private Button[] botonesPlazas;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_plazas);

        confirmar = findViewById(R.id.button30);
        atras = findViewById(R.id.button5);
        atras.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent atras = new Intent(Plazas.this, RegistrarVehiculo.class);
                startActivity(atras);
            }
        });
        confirmar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (seleccion == false) {
                    Toast.makeText(Plazas.this, "Debes seleccionar una plaza", Toast.LENGTH_SHORT).show();
                } else {
                    Toast.makeText(Plazas.this, "Vehículo registrado exitosamente", Toast.LENGTH_SHORT).show();
                    Intent _storedVehicles = new Intent(Plazas.this, VehiculosAlmacenados.class);
                    startActivity(_storedVehicles);
                }
            }
        });

        botonesPlazas = new Button[]{
                findViewById(R.id.button25),
                findViewById(R.id.button24),
                findViewById(R.id.button21),
                findViewById(R.id.button22),
                findViewById(R.id.button12),
                findViewById(R.id.button29),
                findViewById(R.id.button14),
                findViewById(R.id.button16),
                findViewById(R.id.button27),
                findViewById(R.id.button20),
                findViewById(R.id.button23),
                findViewById(R.id.button17),
                findViewById(R.id.button9),
                findViewById(R.id.button13),
                findViewById(R.id.button7),
                findViewById(R.id.button11),
                findViewById(R.id.button28),
                findViewById(R.id.button10),
                findViewById(R.id.button15),
                findViewById(R.id.button26)
        };

        //genera num aleatorios
        int totalPlazas = botonesPlazas.length;
        int plazasOcupadas = totalPlazas / 2;

        // para que no sean mayor que las disponbles
        plazasOcupadas = Math.min(plazasOcupadas, totalPlazas);

        // Lista de plazas opcupadas
        List<Integer> indicesOcupados = new ArrayList<>();
        Random random = new Random();
        while (indicesOcupados.size() < plazasOcupadas) {
            int indice = random.nextInt(totalPlazas);
            if (!indicesOcupados.contains(indice)) {
                indicesOcupados.add(indice);
            }
        }

        for (int i = 0; i < botonesPlazas.length; i++) {
            final int plazaIndex = i + 1;
            botonesPlazas[i].setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    vehiculo = RegistrarVehiculo.getVehiculo();
                    vehiculo.setPlaza(String.format("%02d", plazaIndex));
                    seleccion = true;

                    for (int j = 0; j < botonesPlazas.length; j++) {
                        if (indicesOcupados.contains(j)) {
                            botonesPlazas[j].setBackgroundColor(Color.RED);
                            botonesPlazas[j].setEnabled(false);
                        } else {
                            botonesPlazas[j].setBackgroundColor(Color.GRAY);
                            botonesPlazas[j].setEnabled(true);
                        }
                    }

                    botonesPlazas[plazaIndex - 1].setBackgroundColor(Color.GREEN);
                }
            });

            // Dice si esta ocupado o no
            if (indicesOcupados.contains(i)) {
                botonesPlazas[i].setBackgroundColor(Color.RED);
                botonesPlazas[i].setEnabled(false); // Deshabilita el botón ocupado
            } else {
                botonesPlazas[i].setBackgroundColor(Color.GRAY);
                botonesPlazas[i].setEnabled(true);
            }
        }
    }public static Vehiculo getVehiculoPlaza() {
        return vehiculo;
    }

    public static void borrarVehiculo() {
        vehiculo = null;
    }
}