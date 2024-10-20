package com.example.tickettango



import android.content.Intent
import android.os.Bundle
import android.view.View
import android.widget.ImageView
import android.widget.ScrollView
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.content.ContextCompat
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat


class MainActivity : AppCompatActivity() {

    private lateinit var svNowplaying: ScrollView
    private lateinit var svUpcoming: ScrollView
    private lateinit var tvNowplaying: TextView
    private lateinit var tvUpcoming: TextView

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_main)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }


        // Now Playing Movie Selection
        svNowplaying = findViewById(R.id.svNowPlaying)
        svUpcoming = findViewById(R.id.svUpcoming)
        tvNowplaying = findViewById(R.id.tvNowPlaying)
        tvUpcoming = findViewById(R.id.tvUpcoming)


        svNowplaying.visibility = View.VISIBLE
        svUpcoming.visibility = View.GONE
        tvNowplaying.setTextColor(ContextCompat.getColor(this, R.color.orange))
        tvUpcoming.setTextColor(ContextCompat.getColor(this, R.color.white))

        tvNowplaying.setOnClickListener {
            svNowplaying.visibility = View.VISIBLE
            svUpcoming.visibility = View.GONE
            tvNowplaying.setTextColor(ContextCompat.getColor(this, R.color.orange))
            tvUpcoming.setTextColor(ContextCompat.getColor(this, R.color.white))
        }

        tvUpcoming.setOnClickListener {
            svNowplaying.visibility = View.GONE
            svUpcoming.visibility = View.VISIBLE
            tvNowplaying.setTextColor(ContextCompat.getColor(this, R.color.white))
            tvUpcoming.setTextColor(ContextCompat.getColor(this, R.color.orange))
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