package jmaestrotrace;

import java.awt.BorderLayout;
import java.awt.Dimension;
import java.awt.FlowLayout;
import java.awt.Image;
import java.awt.Toolkit;

import javax.swing.BoxLayout;
import javax.swing.Icon;
import javax.swing.ImageIcon;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTabbedPane;
import javax.swing.JTextField;

public class MainPanel extends JPanel {

	private final Dimension winDimension = new Dimension(650, 600);
	private static JFrame frame = new JFrame();
	private static JFrame topFrame = new JFrame();
	/*
	 * Components
	 */
	private static DumpArea dumpArea = new DumpArea();
	private static JTabbedPane tabPanel = dumpArea.get();
	private static JLabel labelPorta = new JLabel("Porta");
	private static JTextField textPorta = new JTextField("9999");
	private static JLabel labelConnect = new JLabel("Nao conectado");	
	private static JLabel labelBusca = new JLabel("Busca");
	private static JLabel imageLabel = new JLabel();
	/*
	 * Layout panes
	 */
	private static JPanel rightPanel = new JPanel();
	private static JPanel portaPanel = new JPanel();
	private static JPanel buscaPanel = new JPanel();
	private static JPanel topLeftPanel = new JPanel();
	private static JPanel topRightPanel = new JPanel();
	private static JPanel topLeftDownPanel = new JPanel();
	MainPanel() {
		super(new BorderLayout());
		setPreferredSize(winDimension);		
		new Action(labelPorta, textPorta, labelConnect, dumpArea, frame);
		
		rightPanel.setLayout(new FlowLayout());
		rightPanel.add(Action.createBtnComeca());
		rightPanel.add(Action.createBtnPara());
		rightPanel.add(Action.createBtnLimpa());
		rightPanel.add(labelConnect);

		
		portaPanel.setLayout(new FlowLayout());
		portaPanel.add(labelPorta);
		portaPanel.add(textPorta);

		
		buscaPanel.setLayout(new FlowLayout(FlowLayout.LEFT));
		buscaPanel.add(labelBusca, BorderLayout.EAST);
		buscaPanel.add(Action.createTextFieldBusca(), BorderLayout.CENTER);

		
		topRightPanel.setLayout(new BoxLayout(topRightPanel,
				BoxLayout.PAGE_AXIS));
		topRightPanel.add(rightPanel);
		topRightPanel.add(buscaPanel);

		
		topLeftDownPanel.add(Action.createBtnTab());
		topLeftDownPanel.add(Action.createBtnNewTab());
		
		topLeftPanel.setLayout(new BoxLayout(topLeftPanel, BoxLayout.PAGE_AXIS));
		topLeftPanel.add(portaPanel);
		topLeftPanel.add(topLeftDownPanel);
		
		Image img = Toolkit.getDefaultToolkit().getImage(frame.getClass().getResource("/images/icon32.jpg"));
		Icon icon = new ImageIcon(img);
		imageLabel.setIcon(icon);

		JPanel mainTopPanel = new JPanel();
		mainTopPanel.setLayout(new FlowLayout());
		mainTopPanel.add(imageLabel, BorderLayout.EAST);
		mainTopPanel.add(topRightPanel, BorderLayout.CENTER);
		mainTopPanel.add(topLeftPanel, BorderLayout.WEST);

		add(mainTopPanel, BorderLayout.NORTH);
		add(tabPanel, BorderLayout.CENTER);
	}

	public Dimension getDimension() {
		return winDimension;
	}

	private static void createAndShowGUI() {
		frame.setTitle("JMaestroTrace");
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		MainPanel contentPane = new MainPanel();
		contentPane.setOpaque(true);
		// Set win dimensions
		Dimension winDimension = contentPane.getDimension();
		Dimension screen = Toolkit.getDefaultToolkit().getScreenSize();
		int x = (screen.width / 2) - (winDimension.width / 2);
		int y = (screen.height / 2) - (winDimension.height / 2);		
		frame.setIconImage(Toolkit.getDefaultToolkit().getImage(frame.getClass().getResource("/images/icon16.jpg")));
		frame.setBounds(x, y, 0, 0);
		frame.setContentPane(contentPane);
		frame.pack();
		frame.setVisible(true);
	}

	public static void main(String[] args) {		
		javax.swing.SwingUtilities.invokeLater(new Runnable() {
			public void run() {
				createAndShowGUI();
			}
		});
	}

}
