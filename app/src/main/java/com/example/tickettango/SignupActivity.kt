package com.example.tickettango


import android.content.Context
import android.content.Intent
import android.content.SharedPreferences
import android.os.Bundle
import android.util.Log
import android.widget.EditText
import android.widget.ImageButton
import android.widget.TextView
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.content.edit
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat
import org.w3c.dom.Text
import com.example.tickettango.UserHandler

class SignupActivity : AppCompatActivity() {

    private final val user_handler : UserHandler = UserHandler("http://10.0.2.2:8000")
    private final lateinit var pref : SharedPreferences

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

        enableEdgeToEdge()
        setContentView(R.layout.sign_up)
        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.signup)) { v, insets ->
            val systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars())
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom)
            insets
        }
        pref = this.getSharedPreferences(R.string.ticket_store.toString(), Context.MODE_PRIVATE)


        // Login Button
        val tvSignin: TextView = this.findViewById(R.id.tvSignIn)
        tvSignin.setOnClickListener {
            val intent = Intent(this, LoginActivity::class.java)
            startActivity(intent)
        }

        // Signup Button
        val btnSignup: ImageButton = this.findViewById(R.id.btnSignup)
        btnSignup.setOnClickListener {
            val intent = Intent(this, RegisterSuccessActivity::class.java)
            val etName : EditText = findViewById(R.id.etCreateUsername)
            val etEmail : EditText = findViewById(R.id.etAddEmail)
            val etPassword : EditText = findViewById(R.id.etCreatePassword)
            val pwd : String = etPassword.text.toString()
            user_handler.userRegister(etName.text.toString(), etEmail.text.toString(),pwd, pwd ,object : ResponseCallback(){
                override fun call() {
                    pref.edit {
                        putString("name", context?.body()?.user?.name ?: "NO NAME")
                        putString("email", etEmail.text.toString())
                    }
                    startActivity(intent)
                }
            })
        }




    }
}