package com.example.parkingapp;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

public class windowHome extends AppCompatActivity {

    private Button logOutButton;
    private Button registerCar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_window_home);

        logOutButton = findViewById(R.id.button_LOG_OUT);
        registerCar = findViewById(R.id.RegistrarVehiculo);

        logOutButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent logIn = new Intent(windowHome.this, MainActivity.class);
                startActivity(logIn);
            }
        });

        registerCar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent registerC = new Intent(windowHome.this, RegistrarVehiculo.class);
                startActivity(registerC);
            }
        });

    }
}