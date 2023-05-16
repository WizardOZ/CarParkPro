package com.example.parkingapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.TypedValue;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class VehiculosAlmacenados extends AppCompatActivity {

    private TextView textViewVehiculos;
    private Button sacarVehiculo;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_vehiculos_almacenados);

        textViewVehiculos = findViewById(R.id.textView3);
        textViewVehiculos.setTextSize(TypedValue.COMPLEX_UNIT_PX, 50);
        sacarVehiculo = findViewById(R.id.button18);

        // Mostrar el vehículo almacenado en el TextView
        Vehiculo vehiculo = Plazas.getVehiculoPlaza();
        if (vehiculo != null) {
            String info = "Matrícula: " + vehiculo.getMatricula() + "\nColor: " + vehiculo.getColor()
                    + "\nMarca: " + vehiculo.getMarca() + "\nPlaza: " + vehiculo.getPlaza();
            textViewVehiculos.setText(info);
        } else {
            textViewVehiculos.setText("No hay vehículo registrado");
        }

        sacarVehiculo.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Borrar el vehículo almacenado
                Vehiculo vehiculo = RegistrarVehiculo.getVehiculo();
                if (vehiculo != null) {
                    Plazas.borrarVehiculo();
                    Toast.makeText(VehiculosAlmacenados.this, "Vehículo borrado exitosamente", Toast.LENGTH_SHORT).show();
                } else {
                    Toast.makeText(VehiculosAlmacenados.this, "No hay vehículo registrado", Toast.LENGTH_SHORT).show();
                }

                Intent _storedVehicles = new Intent(VehiculosAlmacenados.this, windowHome.class);
                startActivity(_storedVehicles);
            }
        });
    }
}

