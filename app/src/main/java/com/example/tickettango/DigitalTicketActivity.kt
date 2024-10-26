package com.example.tickettango

import android.content.Intent
import android.os.Bundle
import android.widget.ImageButton
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class DigitalTicketActivity : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_digital_ticket)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.ticket)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        val btnback: ImageButton = this.findViewById(R.id.backButton)
        btnback.setOnClickListener {
            val intent = Intent(this, MainActivity::class.java)
            startActivity(intent)
        }

        val movieTitle = intent.getStringExtra("movieTitle")
        val textView: TextView = findViewById(R.id.movietitle)
        textView.text = movieTitle

        val seatsid: TextView = findViewById(R.id.seatsID)
        val selectedSeatIds = intent.getIntegerArrayListExtra("selectedSeatIds") ?: arrayListOf()
        val seatIdsString = selectedSeatIds.joinToString(", ") { seatId ->
            val row = seatId / 15
            val col = seatId % 20
            "${col + 1}${('A' + row)}"
        }
        seatsid.text = seatIdsString


        val numberOfSeats = intent.getIntExtra("numberOfSeats", 0)

        val total: TextView = findViewById(R.id.totalam)
        val gettotal = numberOfSeats * 150
        total.text = "₱$gettotal"

    }
}