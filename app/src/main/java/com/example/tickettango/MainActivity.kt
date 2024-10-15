package com.example.tickettango


import android.content.Intent
import android.os.Bundle
import android.widget.ImageView
import android.widget.LinearLayout
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.GravityCompat
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import androidx.drawerlayout.widget.DrawerLayout
import com.google.android.material.navigation.NavigationView

class MainActivity : AppCompatActivity() {

    private lateinit var drawerLayout: DrawerLayout
    private lateinit var navView: NavigationView


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
        val movies: LinearLayout = findViewById(R.id.llMovies)

        val movielist = arrayOf(
            R.drawable.oip,
            R.drawable.patema,
            R.drawable.jacksparrow,
            R.drawable.mranderson,
            R.drawable.penguinhighway,
        )

        for (image in movielist) {
            val imageView = ImageView(this).apply {
                setImageResource(image)
                layoutParams = LinearLayout.LayoutParams(
                    180,
                    240
                )
                setPadding(16, 16, 16, 16) // Add padding if needed
            }

            imageView.setOnClickListener {
                val intent = Intent(this, MovieDetailActivity::class.java)
                startActivity(intent)
            }

            movies.addView(imageView)
        }


        // Now Playing Movie Selection
        val upmovies: LinearLayout = findViewById(R.id.lluCMovies)

        val upMovies = arrayOf(
            R.drawable.yourname,
            R.drawable.suzume,
            R.drawable.totoro,
            R.drawable.oppenheimer,

            )

        for (image in upMovies) {
            val imageView = ImageView(this).apply {
                setImageResource(image)
                layoutParams = LinearLayout.LayoutParams(
                    180,
                    240
                )
                setPadding(16, 16, 16, 16) // Add padding if needed
            }
            upmovies.addView(imageView)
        }


        drawerLayout = findViewById(R.id.drawer_layout)
        navView = findViewById(R.id.nav_view)

        val drawerIcon: ImageView = findViewById(R.id.menuButton)
        drawerIcon.setOnClickListener {
            drawerLayout.openDrawer(GravityCompat.START)
        }

        navView.setNavigationItemSelectedListener { menuItem ->
            when (menuItem.itemId) {
                R.id.home_nav -> {
                    val intent = Intent(this, MainActivity::class.java)
                    startActivity(intent)
                }
                R.id.movies_nav -> {
                    val intent = Intent(this, MoviesActivity::class.java)
                    startActivity(intent)
                }
                R.id.nav_item3 -> {

                }
            }
            drawerLayout.closeDrawers()
            true
        }



    }
}