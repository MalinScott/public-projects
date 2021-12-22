import Image from "next/image";
import classes from "./hero.module.css";

function Hero() {
  return (
    <section className={classes.hero}>
      <div className={classes.image}>
        <Image
          src="/images/site/TheBeachHouse-main.png"
          alt="Beach House Logo"
          width={350}
          height={350}
        />
        Image
      </div>
      <h1>The Beach House</h1>
      <p>Keep updated with The Beach House's Development </p>
    </section>
  );
}

export default Hero;
