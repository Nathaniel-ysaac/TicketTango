package com.example.tickettango

import android.content.Intent
import android.os.Bundle
import android.view.animation.Animation
import android.view.animation.AnimationUtils
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

        // Animations
        val fadeInAnim = AnimationUtils.loadAnimation(this, R.anim.fade_in)
        val slideUpAnim = AnimationUtils.loadAnimation(this, R.anim.slide_up)
        val slideDownAnim = AnimationUtils.loadAnimation(this, R.anim.slide_down)

        slideUpAnim.setAnimationListener(object : Animation.AnimationListener {
            override fun onAnimationStart(animation: Animation) {}
            override fun onAnimationEnd(animation: Animation) {
                binding.tvDesign1.startAnimation(slideDownAnim)
                binding.tvDesign2.startAnimation(slideUpAnim)
            }
            override fun onAnimationRepeat(animation: Animation) {}
        })
        slideDownAnim.setAnimationListener(object : Animation.AnimationListener {
            override fun onAnimationStart(animation: Animation) {}
            override fun onAnimationEnd(animation: Animation) {
                binding.tvDesign1.startAnimation(slideUpAnim)
                binding.tvDesign2.startAnimation(slideDownAnim)
            }
            override fun onAnimationRepeat(animation: Animation) {}
        })

        binding.tvDesign1.startAnimation(slideDownAnim)
        binding.tvDesign2.startAnimation(slideUpAnim)
        binding.logo.startAnimation(fadeInAnim)
        binding.tvUsername.startAnimation(fadeInAnim)
        binding.etPassword.startAnimation(fadeInAnim)
        binding.tvPassword.startAnimation(fadeInAnim)
        binding.etUsername.startAnimation(fadeInAnim)
        binding.btnLogin.startAnimation(fadeInAnim)


        // Login Button
        val btnLogin: ImageButton = this.findViewById(R.id.btnLogin)
        btnLogin.setOnClickListener {
            val intent = Intent(this, MainActivity::class.java)
            startActivity(intent)
        }

        //Sign up Button
        val textView = findViewById<TextView>(R.id.tvSignup)

        textView.setOnClickListener {
            val intent = Intent(this, SignupActivity::class.java)
            startActivity(intent)
        }


    }
}

