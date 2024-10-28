package com.example.tickettango

import android.content.Context
import android.content.Intent
import android.content.SharedPreferences
import android.os.Bundle
import android.widget.ImageButton
import android.widget.ImageView
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import org.w3c.dom.Text

class ProfileActivity : AppCompatActivity() {

    private final lateinit var pref : SharedPreferences
    private final val user_handler : UserHandler = UserHandler("http://10.0.2.2:8000")

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_profile)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.Profile)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }
        pref = getSharedPreferences(R.string.ticket_store.toString(), Context.MODE_PRIVATE)
        val tvEmail : TextView = findViewById(R.id.tvEmail)
        tvEmail.setText(pref.getString("email", "null"))
        val tvUsername : TextView = findViewById(R.id.username)
        tvUsername.setText(pref.getString("name", "null"))


        val btnTicket: ImageView = this.findViewById(R.id.ticketIcon)
        btnTicket.setOnClickListener {
            val intent = Intent(this, CheckoutActivity::class.java)
            startActivity(intent)
        }
        val btnHome: ImageView = this.findViewById(R.id.homeIcon)
        btnHome.setOnClickListener {
            val intent = Intent(this, MainActivity::class.java)
            startActivity(intent)
        }
        val btnEdit: ImageButton = this.findViewById(R.id.ibEditPf)
        btnEdit.setOnClickListener {
            val intent = Intent(this, EditprofileActivity::class.java)
            startActivity(intent)
        }

        val btnSignout: ImageButton = this.findViewById(R.id.ibSignout)
        btnSignout.setOnClickListener {
            val intent = Intent(this, LoginActivity::class.java)
            startActivity(intent)
        }

    }
}