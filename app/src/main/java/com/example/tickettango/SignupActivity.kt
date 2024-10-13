package com.example.tickettango

import android.content.Intent
import android.graphics.Color
import android.os.Bundle
import android.text.Spannable
import android.text.SpannableString
import android.text.method.LinkMovementMethod
import android.text.style.ClickableSpan
import android.text.style.ForegroundColorSpan
import android.view.View
import android.widget.EditText
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tickettango.databinding.SignUpBinding

class SignupActivity : AppCompatActivity() {

    private lateinit var binding: SignUpBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

        enableEdgeToEdge()
        setContentView(R.layout.sign_up)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.signup)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }
        binding = SignUpBinding.inflate(layoutInflater)
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

        // Signup two text color
        val loginTitle: EditText = findViewById(R.id.signuptitle)
        val spannableStringLogin = SpannableString("Signup")

        spannableStringLogin.setSpan(
            ForegroundColorSpan(Color.WHITE), 0, 3, Spannable.SPAN_EXCLUSIVE_EXCLUSIVE
        )

        spannableStringLogin.setSpan(
            ForegroundColorSpan(Color.parseColor("#FF9900")), 4, 6, Spannable.SPAN_EXCLUSIVE_EXCLUSIVE
        )

        loginTitle.setText(spannableStringLogin)

        // Login Button
        val tvSignup: TextView = findViewById(R.id.tvLogin)

        val signupText = SpannableString("Already have an account? Login")

        signupText.setSpan(
            ForegroundColorSpan(Color.WHITE), 0, signupText.length, Spannable.SPAN_EXCLUSIVE_EXCLUSIVE
        )

        signupText.setSpan(
            ForegroundColorSpan(Color.parseColor("#FF9900")), 23, 29, Spannable.SPAN_EXCLUSIVE_EXCLUSIVE
        )

        // Make Signup clickable
        val clickableSpan = object : ClickableSpan() {
            override fun onClick(widget: View) {
                val intent = Intent(this@SignupActivity, LoginActivity::class.java)
                startActivity(intent)
            }
        }
        signupText.setSpan(clickableSpan, 25, 30, Spannable.SPAN_EXCLUSIVE_EXCLUSIVE)
        tvSignup.text = signupText
        tvSignup.movementMethod = LinkMovementMethod.getInstance()

    }
}