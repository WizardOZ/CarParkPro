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
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.FirebaseApp;
import com.google.firebase.analytics.FirebaseAnalytics;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.*;

public class RegisterLayout extends AppCompatActivity {
    private FirebaseAuth mAuth;
    private EditText userEmail, userPasword;
    private Button registerButton;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        FirebaseApp.initializeApp(this);
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register_layout);

        userEmail = findViewById(R.id.editTextTextPersonName2);
        userPasword = findViewById(R.id.editTextTextPassword3);
        registerButton = findViewById(R.id.button2);

        registerButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String password = userPasword.getText().toString();
                String email = userEmail.getText().toString();

                // revisamos si el campo esta vacio
                if (email.isEmpty() || password.isEmpty()) {
                    Toast.makeText(RegisterLayout.this,
                            "Introduza un Email y contraseña",
                            Toast.LENGTH_SHORT).show();
                } else {
                    registerUser(email, password);
                }
            }
        });
    }

    private void registerUser(String email, String password){

        FirebaseAuth.getInstance().createUserWithEmailAndPassword(email, password).
                addOnCompleteListener(new OnCompleteListener<AuthResult>() {
            @Override
            public void onComplete(@NonNull Task<AuthResult> task) {
                if(task.isSuccessful()){
                    Intent register = new Intent(RegisterLayout.this, windowHome.class);
                    startActivity(register);
                }
            }
        });
    }

}
