package com.example.parkingapp;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;

import android.text.TextUtils;

import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.FirebaseApp;
import com.google.firebase.analytics.FirebaseAnalytics;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.crashlytics.FirebaseCrashlytics;

public class MainActivity extends AppCompatActivity {

    //inicializamos las variables

    private EditText userEmail, userPasword;
    private Button registerButton;
    private Button logginButton;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        FirebaseApp.initializeApp(this);
        FirebaseCrashlytics.getInstance().setCrashlyticsCollectionEnabled(true);
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //inicializar el edit text usuario, la contraseña y los boton
        userEmail = findViewById(R.id.editTextTextPersonName3);
        userPasword = findViewById(R.id.editTextTextPassword2);
        registerButton = findViewById(R.id.button4);
        logginButton = findViewById(R.id.button3);

        //Creamos el click listener del boton login y register

        registerButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent register = new Intent(MainActivity.this, RegisterLayout.class);
                startActivity(register);
            }
        });

        logginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String password = userPasword.getText().toString();
                String email = userEmail.getText().toString();

                // revisamos si el campo esta vacio
                if(TextUtils.isEmpty(email) || TextUtils.isEmpty(password)){
                    Toast.makeText(MainActivity.this, "Introduza el usuario y la contraseña", Toast.LENGTH_SHORT).show();
                }else{
                    FirebaseAuth.getInstance().signInWithEmailAndPassword(email, password).addOnCompleteListener(new OnCompleteListener<AuthResult>() {
                        @Override
                        public void onComplete(@NonNull Task<AuthResult> task) {
                            if(task.isSuccessful()){
                                Intent home = new Intent(MainActivity.this, windowHome.class);
                                startActivity(home);
                            }else{
                                Toast.makeText(MainActivity.this, "Error al iniciar Sesiosn, Comprueba tu Usuario o Contraseña", Toast.LENGTH_SHORT).show();
                            }
                        }
                    });
                }

            }
        });
    }

}