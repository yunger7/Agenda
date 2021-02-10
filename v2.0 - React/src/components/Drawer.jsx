import { useState } from "react";

// MUI
import { Drawer } from "@material-ui/core";

const Drawer = () => {
  const [isOpen, setIsOpen] = useState(false);

  return (
    <Drawer open={isOpen} onClose={() => setIsOpen(false)}>

    </Drawer>
  );
}
 
export default Drawer;