package com.example.tickettango

import android.content.Intent
import android.os.Bundle
import android.os.Handler
import android.os.Looper
import android.widget.ImageButton
import android.widget.Toast
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class PaymentActivity : AppCompatActivity() {


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_payment)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.payment)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }


        //Pay Now Button
        val btnPay: ImageButton = this.findViewById(R.id.btnGetTkt)
        btnPay.setOnClickListener {
            Toast.makeText(this, "Ticket Get Successfully!", Toast.LENGTH_SHORT).show()

            // Delay for 3 seconds (3000 ms) before redirecting to another activity
            Handler(Looper.getMainLooper()).postDelayed({
                // Redirect to the new activity
                val intent = Intent(this, MainActivity::class.java)
                startActivity(intent)
                finish() // Optional: Call this to finish the current activity
            }, 3000)
        }

    }
}