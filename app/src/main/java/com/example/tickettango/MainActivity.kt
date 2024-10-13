package com.example.tickettango

import android.content.Intent
import android.graphics.Color
import android.os.Bundle
import android.text.Spannable
import android.text.SpannableString
import android.text.style.ForegroundColorSpan
import android.widget.EditText
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