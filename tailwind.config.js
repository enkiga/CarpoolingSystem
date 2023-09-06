/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "gray-20": "#F8F4EB",
                "gray-50": "#EFE6E6",
                "gray-100": "#DFCCCC",
                "gray-500": "#1c2541",
                "primary-50": "#e5fff5",
                "primary-100": "#C7F9CC",
                "primary-300": "#80ED99",
                "primary-500": "#57CC99",
                "secondary-400": "#38A3A5",
                "secondary-500": "#22577A",
            },
        },
        screens: {
            xs: "480px",
            sm: "768px",
            md: "1060px",
        }
    },
    plugins: [],
}
