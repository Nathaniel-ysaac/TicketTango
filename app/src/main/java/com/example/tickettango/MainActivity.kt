package com.example.tickettango

import android.content.Intent
import android.os.Bundle
import android.widget.GridLayout
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

    }
}