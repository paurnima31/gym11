<!DOCTYPE html>
<html>
 <title>Fitness Expert Gym</title>
<style>  
#about{
  padding: 100px 0px;
}
.about-row{
  width: 100%;
  display: flex;
  justify-content: space-around;
  align-items: center;
}
.about-right-col{
  width: 300px;
  height: 300px;
  border-radius: 50%;
  overflow: hidden;
  background-color: black;
  display: inline-block;
  vertical-align: middle;
}
.about-right-col img{
  width: 100%;
}
.about-left-col{
  flex-basis: 50%;
  max-width: 400px;
  margin: auto;
}
.about-left-col h1{
  font-size: 50px;
}
.about-left-col p{
  font-size: 20px;
  text-align: justify;
  margin: 15px 0px;
}
.c-btn{
  padding: 10px;
  margin: 20px 0px;
  color: white;
  border: none;
  background: #74b9ff ;
 }


#blue{
  color: #74b9ff;
}

#services{
  padding: 50px 0px;

}
.services-info{
  text-align: center;
}
.services-info h1{
  font-size: 50px;
}
.services-info p{
  font-size: 25px;
  font-weight: bold;
}
.services-row{
  display: grid;
  grid-template-columns: repeat(3, 200px);
  grid-auto-rows: minmax(150px,auto);
  grid-gap: 3em;
  justify-content: center;
  padding-top: 20px;
}
.services-box{
  box-shadow: 2px 3px 5px grey;
  padding: 10px;
  text-align: center;
}


#work{
  padding-top: 50px;
  padding-bottom: 200px;
  background: rgba(0, 0, 0, 0.03);
  clip-path: polygon(0% 0%,100% 0%,100% 100%,80% 80%,0% 100%);
}
.work-box{

  box-shadow: 2px 3px 5px grey;
}
.work-box img{
  width: 100%;
  height: 100%;
}


</style>
<body>
<section id="about">
  <div class="about-row">
    <div class="about-left-col">
      <h1>About <span id="blue">me</span></h1>
      <p id="p-title">I am Rohit Raut.</p>
      <p>I am the owner of Fitness Expert Gym(FEG). FEG was my dream and its comes true.
      FEG was established on March 2022.
      In FEG we provide best training,and our trainer is also having so much experience about training. Our gym is very hygenic.
      We also provided best equipment to our gym member. We provides special ladies  workout batches. Our gym is in Loni central, above pink city,Loni
     this is safe for night gym. For further information you can also contact me...We are giving contact details on the home page.</p>
     <p>Thank You...</p>  
    <form action="index.html">
      <button class="c-btn">Home</button>
    </form>
  </div>
    <div class="about-right-col">
     <img src="images/rohit.png">
    </div> 
  </div>
</section>

<section id="services">
  <div class="services-info">
    <h1>Our <span id="blue">Services</span></h1>
    <p>What we Provide</p>
  </div>
  <div class="services-row">
    <div class="services-box">
      <h2>Cardio</h2>
      <p>Cardio exercise can benefit brain and joint health.One study reportes that physical activity</p>
    </div>

    <div class="services-box">
      <h2>Yoga</h2><br>
      <p>Yoga improve strength,balance and flexibility</p>
    </div>

    <div class="services-box">
      <h2>Zumba</h2>
      <p>It's fun.The more you enjoy your excersice routine,the more likely you are to stick with it</p>
    </div>

    <div class="services-box">
      <h2>Weight Training</h2>
      <p>Increased muscle mass:Muscle mass naturaly decreases with age, but strength training can help reverse the trend.</p>
    </div>

    <div class="services-box">
      <h2>Crossfit</h2>
      <p>May improve physical strength.The high-intensity,multi_joint movements in crossfit may help you gain muscle strength and stamina</p>
    </div>

    <div class="services-box">
      <h2>Diet Plane</h2><br>
      <p>May help you live longer,supports muscle,boosts immunity</p>
    </div>
  </div>
</section>

<section id=work>
  <div class="services-info">
    <h1>Our <span id="blue">Works</span></h1>
    <p>What we Provide</p>
  </div>
  <div class="services-row">
    <div class="work-box">
      <img src="images/img4.jpg">
    </div>

    <div class="work-box">
      <img src="images/img5.jpg">
    </div>

    <div class="work-box">
      <img src="images/img6.jpg">
    </div>

    <div class="work-box">
      <img src="images/img7.jpg">
    </div>

    <div class="work-box">
      <img src="images/img8.jpg">
    </div>

    <div class="work-box">
      <img src="images/img9.jpg">
    </div>
  </div>
</section>

</body>
</html>