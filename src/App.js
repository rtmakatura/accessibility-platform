import "./App.css";

function App() {
  return (
    <div
      style={{
        minHeight: "100vh",
        backgroundColor: "#f9fafb",
        padding: "2rem",
      }}
    >
      <h1
        style={{
          fontSize: "1.875rem",
          fontWeight: "bold",
          color: "#192A80",
          marginBottom: "2rem",
        }}
      >
        ReadySetComply - React Frontend
      </h1>

      <div
        style={{
          backgroundColor: "white",
          padding: "1.5rem",
          borderRadius: "8px",
          boxShadow: "0 1px 3px rgba(0,0,0,0.1)",
        }}
      >
        <p style={{ color: "#196F80", marginBottom: "1rem" }}>
          Your React frontend is working!
        </p>
        <p style={{ color: "#666" }}>
          Next: Add your WordPress content and build components
        </p>
      </div>
    </div>
  );
}

export default App;
