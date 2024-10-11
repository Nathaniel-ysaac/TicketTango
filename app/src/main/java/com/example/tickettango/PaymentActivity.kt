package com.example.tickettango

import android.content.Intent
import android.os.Bundle
import android.os.Handler
import android.os.Looper
import android.view.animation.Animation
import android.view.animation.AnimationUtils
import android.widget.ImageButton
import android.widget.Toast
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tickettango.databinding.ActivityPaymentBinding

class PaymentActivity : AppCompatActivity() {

    private lateinit var binding: ActivityPaymentBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_payment)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.payment)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }


        binding = ActivityPaymentBinding.inflate(layoutInflater)
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


        //Pay Now Button
        val btnPay: ImageButton = this.findViewById(R.id.btnPay)
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