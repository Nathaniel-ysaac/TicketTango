package com.example.tickettango

import android.content.Intent
import android.os.Bundle
import android.util.Log
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class GCashActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_gcash_form)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.gcash_form)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }
        val movieTitle = intent.getStringExtra("movieTitle")
        val numberOfSeats = intent.getIntExtra("numberOfSeats", 0)
        val selectedSeats = intent.getIntegerArrayListExtra("selectedSeatIds")

        val proceedBtn : Button = findViewById<Button>(R.id.proceedBtn)

        proceedBtn.setOnClickListener{
            val intent = Intent(this, PaymentSuccessActivity::class.java)

            val etUserNumber : EditText = findViewById(R.id.userNumber)
            val userNumber : String = etUserNumber.text.toString().removePrefix("0")
            Log.d(">>>", userNumber)
            if(userNumber.matches(Regex("(?=^9.*)[0-9]{10}"))){

                startActivity(intent)
            }
            else{
                val hiddenWarning : TextView = findViewById(R.id.hiddenWarning)
                hiddenWarning.setText("must be a 10 digit number that starts with 9 excluding the excluding the first zero/es")
            }



        }
    }
}