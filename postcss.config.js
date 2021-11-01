module.exports = {
  plugins: [
    [
      "postcss-preset-env",
      {
        // Options
        stage: 2,
        features: {
          'custom-properties': false // true to keep fallbacks
        }
      },
    ]
  ],
}
