
let { useRef, useEffect } = React;

let data = Array(20).fill(0).map((e, i) => ({
  image: `https://picsum.photos/seed/${i * 2}/200/100`,
  id: i
}));

let CardContent = () => {
  return (
    <div className="card-content">
      <div className="text" style={{ width: "80%" }}></div>
      <div className="text" style={{ width: "60%" }}></div>
      <div className="text" style={{ width: "40%" }}></div>
      <div className="text" style={{ width: "70%" }}></div>
    </div>
  );
};

let Card = ({ image }) => {  
  return (
    <div className="card">      
      <img src={image} />
      <CardContent />     
    </div>
  );
};

let App = () => {
  
  let el = useRef();
  let q = gsap.utils.selector(el);
      
  useEffect(() => {
    
    let timeline = gsap.timeline({
      repeat: -1,
      repeatDelay: 1,
      yoyo: true
    });    
        
    // The component has been rendered, so we can now select
    // descendants of the component, including descendants
    // nested inside of other components
    timeline.to(q(".card"), {
      opacity: 1,
      stagger: {
        each: 0.1,
        from: 0,
        grid: "auto"
      }
    });
    
    timeline.from(q(".card-content"), {
      opacity: 0,
      y: 20,
      stagger: {
        each: 0.1,
        from: 0,
        grid: "auto"
      }
    }, 0.25);    
  }, []);
  
  return (
    <div ref={el}>
      <h1>React scoped selector</h1>
      {
        data.map(e => <Card {...e} key={e.id} />)
      }
    </div>
  );
}

ReactDOM.render(<App/>, document.querySelector('#app'));