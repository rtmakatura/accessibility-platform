const WP_API_URL = 'https://readysetcomply.com/wp-json/wp/v2';

export const fetchPages = async () => {
  try {
    const response = await fetch(`${WP_API_URL}/pages`);
    const data = await response.json();
    return data;
  } catch (error) {
    console.error('Error fetching pages:', error);
    return [];
  }
};