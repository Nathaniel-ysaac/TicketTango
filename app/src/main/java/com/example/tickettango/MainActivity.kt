package com.example.tickettango



import android.content.Intent
import android.os.Bundle
import android.widget.ImageView
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat


class MainActivity : AppCompatActivity() {


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_main)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        val btnUpcoming: TextView = this.findViewById(R.id.tvUpcoming)
        btnUpcoming.setOnClickListener {
            val intent = Intent(this, MoviesActivity::class.java)
            startActivity(intent)
        }


        val movie1: ImageView = this.findViewById(R.id.ivNPCinema1)
        movie1.setOnClickListener {
            val intent = Intent(this, MovieDetailActivity::class.java)
            startActivity(intent)
        }


        val movie2: ImageView = this.findViewById(R.id.ivNPCinema2)
        movie2.setOnClickListener {
            val intent = Intent(this, Movie2DetailActivity::class.java)
            startActivity(intent)
        }
        val movie3: ImageView = this.findViewById(R.id.ivNPCinema3)
        movie3.setOnClickListener {
            val intent = Intent(this, Movie3DetailActivity::class.java)
            startActivity(intent)
        }
        val movie4: ImageView = this.findViewById(R.id.ivNPCinema4)
        movie4.setOnClickListener {
            val intent = Intent(this, Movie4DetailActivity::class.java)
            startActivity(intent)
        }

        val btnTicket: ImageView = this.findViewById(R.id.ticketIcon)
        btnTicket.setOnClickListener {
            val intent = Intent(this, CheckoutActivity::class.java)
            startActivity(intent)
        }
        val btnProfile: ImageView = this.findViewById(R.id.profileIcon)
        btnProfile.setOnClickListener {
            val intent = Intent(this, ProfileActivity::class.java)
            startActivity(intent)
        }

    }
}