package com.example.tickettango

import android.content.Intent
import android.os.Bundle
import android.widget.ImageView
import android.widget.RelativeLayout
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class MoviesActivity : AppCompatActivity() {


    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_movies)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.moviesactivity)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }

        val btnNowPlaying: TextView = this.findViewById(R.id.tvNowPlaying)
        btnNowPlaying.setOnClickListener {
            val intent = Intent(this, MainActivity::class.java)
            startActivity(intent)
        }



        val movie1: RelativeLayout = this.findViewById(R.id.rlUCMovie1)
        movie1.setOnClickListener {
            val intent = Intent(this, UpcomingMovie1Activity::class.java)
            startActivity(intent)
        }
        val movie2: RelativeLayout = this.findViewById(R.id.rlUCMovie2)
        movie2.setOnClickListener {
            val intent = Intent(this, UpcomingMovie2Activity::class.java)
            startActivity(intent)
        }
        val movie3: RelativeLayout = this.findViewById(R.id.rlUCMovie3)
        movie3.setOnClickListener {
            val intent = Intent(this, UpcomingMovie3Activity::class.java)
            startActivity(intent)
        }
        val movie4: RelativeLayout = this.findViewById(R.id.rlUCMovie4)
        movie4.setOnClickListener {
            val intent = Intent(this, UpcomingMovie4Activity::class.java)
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