import Head from "next/head";
import { Fragment } from "react";
import ContactForm from "../../components/contact/contact-form";

function ContactPage() {
  return (
    <Fragment>
       <Head>
          <title>Contact | The Beach House</title>
          <meta name='description' content='Send your messages'/>
       </Head>
      <ContactForm />
    </Fragment>
  );
}
export default ContactPage;
