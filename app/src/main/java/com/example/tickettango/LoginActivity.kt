package com.example.tickettango

import android.content.Intent
import android.graphics.Color
import android.text.Spannable
import android.text.SpannableString
import android.text.style.ForegroundColorSpan
import android.text.method.LinkMovementMethod
import android.text.style.ClickableSpan
import android.view.View
import android.widget.EditText
import android.os.Bundle
import android.widget.ImageButton
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tickettango.databinding.ActivityLoginBinding

class LoginActivity : AppCompatActivity() {

    private lateinit var binding: ActivityLoginBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

        enableEdgeToEdge()
        setContentView(R.layout.activity_login)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.login)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }
        binding = ActivityLoginBinding.inflate(layoutInflater)
        setContentView(binding.root)

        // Tango Title two color text
        val tangoTitle: EditText = findViewById(R.id.tangotitle)

        val spannableStringTango = SpannableString("TicketTango")

        spannableStringTango.setSpan(
            ForegroundColorSpan(Color.WHITE), 0, 6, Spannable.SPAN_EXCLUSIVE_EXCLUSIVE
        )

        spannableStringTango.setSpan(
            ForegroundColorSpan(Color.parseColor("#FF9900")), 6, 11, Spannable.SPAN_EXCLUSIVE_EXCLUSIVE
        )

        tangoTitle.setText(spannableStringTango)

        // Login Text two colors
        val loginTitle: EditText = findViewById(R.id.logintitle)
        val spannableStringLogin = SpannableString("Login")

        spannableStringLogin.setSpan(
            ForegroundColorSpan(Color.WHITE), 0, 3, Spannable.SPAN_EXCLUSIVE_EXCLUSIVE
        )

        spannableStringLogin.setSpan(
            ForegroundColorSpan(Color.parseColor("#FF9900")), 3, 5, Spannable.SPAN_EXCLUSIVE_EXCLUSIVE
        )

        loginTitle.setText(spannableStringLogin)

        // Login Button
        val btnLogin: ImageButton = this.findViewById(R.id.btnLogin)
        btnLogin.setOnClickListener {
            val intent = Intent(this, MainActivity::class.java)
            startActivity(intent)
        }

        // Sign up Button
        val tvSignup: TextView = findViewById(R.id.tvSignup)

        val signupText = SpannableString("Don't have an account? Signup")

        signupText.setSpan(
            ForegroundColorSpan(Color.WHITE), 0, signupText.length, Spannable.SPAN_EXCLUSIVE_EXCLUSIVE
        )

        signupText.setSpan(
            ForegroundColorSpan(Color.parseColor("#FF9900")), 23, 29, Spannable.SPAN_EXCLUSIVE_EXCLUSIVE
        )

        // Make Signup clickable
        val clickableSpan = object : ClickableSpan() {
            override fun onClick(widget: View) {
                val intent = Intent(this@LoginActivity, SignupActivity::class.java)
                startActivity(intent)
            }
        }
        signupText.setSpan(clickableSpan, 23, 29, Spannable.SPAN_EXCLUSIVE_EXCLUSIVE)
        tvSignup.text = signupText
        tvSignup.movementMethod = LinkMovementMethod.getInstance()
    }
}
