import Image from "next/image";
import Link from "next/link";
import classes from "./posts-item.module.css";

function PostsItem(props) {
   const { title, image, message, date, slug  } = props.post;

   const formattedDate = new Date(date).toLocaleDateString('en-US', {
      date: 'numeric',
      month: 'long',
      year: 'numeric'
   });

   const imagePath = `/images/posts/${slug}/${image}`;
   const linkPath = `/posts/${slug}`;

  return (
    <li className={classes.post}>
      <Link href={linkPath}>
        <a>
          <div className={classes.image}>
            <Image src={imagePath} alt={title} width={300} height={200} priority='true' layout="responsive"/>
          </div>
          <div className={classes.content}>
            <h3>{title}</h3>
            <time>{formattedDate}</time>
            <p>{message}</p>
          </div>
        </a>
      </Link>
    </li>
  );
}

export default PostsItem;
