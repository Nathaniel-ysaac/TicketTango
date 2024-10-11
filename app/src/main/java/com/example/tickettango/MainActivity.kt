package com.example.tickettango

import android.content.Intent
import android.os.Bundle
import android.view.animation.Animation
import android.view.animation.AnimationUtils
import android.widget.GridLayout
import android.widget.ImageButton
import android.widget.ImageView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.content.ContextCompat
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import com.example.tickettango.databinding.ActivityMainBinding

class MainActivity : AppCompatActivity() {

    private lateinit var binding: ActivityMainBinding

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        enableEdgeToEdge()
        setContentView(R.layout.activity_main)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }
        binding = ActivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)


        // Animations
        val fadeInAnim = AnimationUtils.loadAnimation(this, R.anim.fade_in)
        val slideRightAnim = AnimationUtils.loadAnimation(this, R.anim.slide_right)
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
        binding.bgUsername.startAnimation(slideRightAnim)
        binding.bgUsername.startAnimation(fadeInAnim)
        binding.tvUserGreeting.startAnimation(fadeInAnim)
        binding.tvUserGreeting.startAnimation(slideRightAnim)
        binding.tvMovieSelect.startAnimation(fadeInAnim)
        binding.glMovies.startAnimation(fadeInAnim)
        binding.svMovie.startAnimation(fadeInAnim)


        // Movie Selection
        val gridLayout: GridLayout = findViewById(R.id.glMovies)

        val imageResIds = arrayOf(
            R.drawable.oip,
            R.drawable.patema,
            R.drawable.jacksparrow,
            R.drawable.mranderson,
            R.drawable.penguinhighway,
            R.drawable.yourname,
            R.drawable.suzume,
            R.drawable.totoro,
            R.drawable.oppenheimer,

        )

        for (imageResId in imageResIds) {
            val imageView = ImageView(this)
            imageView.setImageDrawable(ContextCompat.getDrawable(this, imageResId))
            imageView.layoutParams = GridLayout.LayoutParams().apply {
                width = 440
                height = 660
                setMargins(16, 16, 16, 16)

            }

            imageView.setOnClickListener {
                // Navigate to the corresponding activity
                val intent = Intent(this, MovieDetailActivity::class.java)
                startActivity(intent)
            }

            gridLayout.addView(imageView)
        }


        val btnTickets: ImageButton = this.findViewById(R.id.btnTickets)
        btnTickets.setOnClickListener {
            val intent = Intent(this, DigitalTicketActivity::class.java)
            startActivity(intent)
        }


    }
}