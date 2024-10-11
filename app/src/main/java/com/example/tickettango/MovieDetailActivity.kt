package com.example.tickettango

import android.content.Intent
import android.os.Bundle
import android.view.animation.Animation
import android.view.animation.AnimationUtils
import android.widget.ImageButton
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tickettango.databinding.ActivityMovieDetailBinding

class MovieDetailActivity : AppCompatActivity() {

    private lateinit var binding: ActivityMovieDetailBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_movie_detail)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.movie)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }
        binding = ActivityMovieDetailBinding.inflate(layoutInflater)
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
        binding.svInfo.startAnimation(fadeInAnim)
        binding.btnGet.startAnimation(fadeInAnim)



        val btnGet: ImageButton = this.findViewById(R.id.btnGet)
        btnGet.setOnClickListener {
            val intent = Intent(this, PaymentActivity::class.java)
            startActivity(intent)
        }


    }
}