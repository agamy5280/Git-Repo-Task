const loginForm = document.getElementById("myForm");
const loginButton = document.getElementById("submit");

loginButton.addEventListener("click", async() => {
    let email = loginForm.email.value;
    let password = loginForm.password.value;
    let res = await fetch("http://localhost:5000/api/users/login",{
        method: 'POST',
        headers:{
          'x-access-token': 'Bearer <token>',
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({"email": email, "password": password})
      })
      .then(async(res) => {
        let data = await res.json();
        localStorage.setItem("x-access-token",data.token);
        localStorage.setItem("userID", data._id);
        alert("You have successfully logged in.");
        window.location.href = "index.html";
      })
      .catch((err) => {
        alert("login Failed!")
        console.log(err);
      })
})
// {"email":"ramymibrahim@yahoo.com","password":"123456"}