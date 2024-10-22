package com.example.tickettango

import android.content.Intent
import android.os.Bundle
import android.widget.ImageButton
import android.widget.TextView
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

        val seatsid: TextView = findViewById(R.id.seatsID)
        val selectedSeatIds = intent.getIntegerArrayListExtra("selectedSeatIds") ?: arrayListOf()
        val seatIdsString = selectedSeatIds.joinToString(", ") { seatId ->
            val row = seatId / 15
            val col = seatId % 20
            "${col + 1}${('A' + row)}"
        }
        seatsid.text = seatIdsString


        val numberOfSeats = intent.getIntExtra("numberOfSeats", 0)
        val seatsno: TextView = findViewById(R.id.noOfSeats)
        seatsno.text = "$numberOfSeats"

        val ticketsno: TextView = findViewById(R.id.noOfTickets)
        ticketsno.text = "$numberOfSeats"


        val total: TextView = findViewById(R.id.totalam)
        val gettotal = numberOfSeats * 150
        total.text = "₱$gettotal"


        //Pay Now Button
        val btnPay: ImageButton = this.findViewById(R.id.ibPayNow)
        btnPay.setOnClickListener {
                val intent = Intent(this, MainActivity::class.java)
                startActivity(intent)
            }


    }

}
