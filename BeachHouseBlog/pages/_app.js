import '../styles/globals.css'
import Layout from '../components/layout/layout';
import Head from 'next/head';

function MyApp({ Component, pageProps }) {
  return (
    <Layout>
      <Head>
        <meta name='viewport' content='width=device-width, initial-scale=1'/>
        <title>The Beach House</title>
        <link rel="icon" type="image/png" href="/images/site/bhfavicon-x16.png" sizes="16x16"/>
        <link rel="icon" type="image/png" href="/images/site/bhfavicon-x32.png" sizes="32x32"/>
        <link rel="icon" type="image/png" href="/images/site/bhfavicon-x96.png" sizes="96x96"/>
      </Head>
      <Component {...pageProps} />
    </Layout>
    );
    
}
32
export default MyApp
